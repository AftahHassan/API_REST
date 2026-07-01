<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function repurpose(Request $request)
    {
        $request->validate([
            'blueprint_id' => ['required', 'exists:blueprints,id'],
            'contenu_brut' => ['required', 'string'],
        ]);

        // Création du RawContent
        $rawContent = auth()->user()->rawContents()->create([
            'blueprint_id' => $request->blueprint_id,
            'contenu_brut' => $request->contenu_brut,
            'statut'       => 'en_attente',
        ]);

        /*
        |--------------------------------------------------------------------------
        | LAB 3 : Simulation de l'IA
        | Plus tard cette partie sera remplacée par :
        | $response = (new PostGenerator)->prompt($rawContent->contenu_brut);
        |--------------------------------------------------------------------------
        */

        $response = [
            'hook_propose' => 'Pourquoi Java reste incontournable en 2026 ?',

            'body_points' => [
                'Java est toujours très utilisé.',
                'Spring Boot accélère le développement.',
                'Les entreprises recherchent des développeurs Java.'
            ],

            'technical_readability_score' => 92,

            'suggested_hashtags' => [
                '#Java',
                '#SpringBoot',
                '#Backend'
            ],

            'tone_compliance_justification' =>
                'Le ton est professionnel et adapté aux développeurs.'
        ];

        // Création du GeneratedPost
        $rawContent->generatedPost()->create([
            'hook_propose'                  => $response['hook_propose'],
            'body_points'                   => $response['body_points'],
            'technical_readability_score'   => $response['technical_readability_score'],
            'suggested_hashtags'            => $response['suggested_hashtags'],
            'tone_compliance_justification' => $response['tone_compliance_justification'],
            'statut'                        => 'draft',
        ]);

        // Mise à jour du statut
        $rawContent->update([
            'statut' => 'traite'
        ]);

        return response()->json([
            'message' => 'Post généré avec succès.',
            'raw_content_id' => $rawContent->id,
        ], 201);
    }
}