<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Asegúrate de importar Log

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $messageContent = $request->input('message');

        try {
            Log::info("Preparando para enviar correo desde {$email}");

            // Enviar correo electrónico
            Mail::raw($messageContent, function ($message) use ($name, $email) {
                $message->to('tu@email.com')
                        ->subject('Nuevo mensaje de contacto')
                        ->from($email, $name);
            });

            Log::info("Correo enviado exitosamente a tu@email.com");
        } catch (\Exception $e) {
            Log::error("Error al enviar correo: " . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un problema enviando tu mensaje.');
        }

        return redirect()->back()->with('message', '¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
    }
}
