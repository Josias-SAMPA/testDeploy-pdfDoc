<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class Controller
{
    public function downloadPdf()
    {
        // Récupérer les données (exemples: nom, email sans données sensibles)
        $users = User::select('id', 'name', 'email', 'created_at')->get();
        
        $data = [
            'title' => 'Rapport des Utilisateurs',
            'users' => $users,
            'date' => now()->format('d/m/Y H:i')
        ];
        
        // Charger la vue avec les données et générer le PDF
        $pdf = Pdf::loadView('pdf.download', $data);
        
        // Télécharger le PDF
        return $pdf->download('donnees_' . date('Y-m-d') . '.pdf');
    }
}
