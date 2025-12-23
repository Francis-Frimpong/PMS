<?php
namespace App\Core;

class FlashMessage{

    private static function startSession(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function addMessage(string $messageType, string $message): void{

        self::startSession();

        $_SESSION['flashMessage'] =[
            'type' => $messageType,
            'message' => $message
        ];
    }

    public static function getMessage(): ?array
    {
        self::startSession();
        
        if (!isset($_SESSION['flashMessage'])){
            return null;
        }

        $flashMessage = $_SESSION['flashMessage'];
        unset($_SESSION['flashMessage']);
        return $flashMessage;

    }
}

