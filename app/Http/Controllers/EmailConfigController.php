<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailConfigController extends Controller
{
    public function index()
    {
        // Récupérer les paramètres de configuration email depuis .env
        $emailConfig = [
            'mail_mailer' => env('MAIL_MAILER', 'smtp'),
            'mail_host' => env('MAIL_HOST', 'smtp.mailtrap.io'),
            'mail_port' => env('MAIL_PORT', '2525'),
            'mail_username' => env('MAIL_USERNAME', ''),
            'mail_password' => env('MAIL_PASSWORD', ''),
            'mail_encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'mail_from_address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'mail_from_name' => env('MAIL_FROM_NAME', config('app.name')),
        ];

        return view('config.email.index', compact('emailConfig'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|numeric',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'required|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
        ]);

        // Mettre à jour le fichier .env
        $this->updateEnvFile($validated);

        toast('Configuration email mise à jour avec succès!', 'success');
        return redirect()->back();
    }

    private function updateEnvFile($data)
    {
        $envFile = base_path('.env');
        $envContent = file_get_contents($envFile);

        $updates = [
            'MAIL_MAILER' => $data['mail_mailer'],
            'MAIL_HOST' => $data['mail_host'],
            'MAIL_PORT' => $data['mail_port'],
            'MAIL_USERNAME' => $data['mail_username'],
            'MAIL_PASSWORD' => $data['mail_password'],
            'MAIL_ENCRYPTION' => $data['mail_encryption'],
            'MAIL_FROM_ADDRESS' => $data['mail_from_address'],
            'MAIL_FROM_NAME' => '"' . $data['mail_from_name'] . '"',
        ];

        foreach ($updates as $key => $value) {
            $pattern = "/^{$key}=.*/m";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, "{$key}={$value}", $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }
        }

        file_put_contents($envFile, $envContent);
    }
}
