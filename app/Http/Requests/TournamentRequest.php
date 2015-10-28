<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TournamentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|nom',
            'lieu' => 'required|lieu',
            'adresse' => 'required|adresse',
            'nbEquipe' => 'required|nbEquipe',
            'nbTerrain' => 'required|nbTerrain',
            'nbGroupe' => 'required|nbGroupe',
            'timeMatch' => 'required|timeMatch',
            'timeEntre' => 'required|timeEntre',
            'typeTournoi' => 'required|typeTournoi',
            'date' => 'required|date',
        ];
    }
}
