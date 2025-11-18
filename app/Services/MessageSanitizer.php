<?php

namespace App\Services;

class MessageSanitizer
{
    public static function sanitize(string $message): string
    {
        // Remove todos os caracteres nulos e caracteres de controle
        $message = self::removeControlCharacters($message);
        
        // Remove todas as tags HTML e PHP
        $message = strip_tags($message);
        
        // Decodifica entidades HTML para tratar tentativas de bypass
        $message = html_entity_decode($message, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        // Remove URLs e links
        $message = self::removeUrls($message);
        
        // Remove código malicioso
        $message = self::removeMaliciousCode($message);
        
        // Remove caracteres especiais perigosos
        $message = self::removeDangerousCharacters($message);
        
        // Normaliza espaços
        $message = self::normalizeSpaces($message);
        
        return trim($message);
    }
    
    private static function removeControlCharacters(string $text): string
    {
        // Remove caracteres de controle (exceto tab, newline, carriage return)
        return preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/', '', $text);
    }
    
    private static function removeUrls(string $text): string
    {
        $patterns = [
            // URLs completas
            '/https?:\/\/[^\s\]\)]+/i',
            // URLs sem protocolo
            '/www\.[^\s\]\)]+/i',
            // Domínios genéricos
            '/[a-z0-9\-]+\.(com|org|net|br|info|biz|io|tk|ml|ga|cf)[^\s\]\)]*/i',
            // IP addresses
            '/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}[^\s\]\)]*/',
            // URLs encurtadas
            '/\b[a-z0-9\-]+\.[a-z]{2,}(\/[^\s\]\)]*)?/i',
        ];
        
        $cleanText = preg_replace($patterns, '[LINK REMOVIDO]', $text);
        
        // Remove marcações de email
        $cleanText = preg_replace('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i', '[EMAIL REMOVIDO]', $cleanText);
        
        return $cleanText;
    }
    
    private static function removeMaliciousCode(string $text): string
    {
        $patterns = [
            // JavaScript e outros protocols
            '/javascript:/i',
            '/vbscript:/i',
            '/data:text\/html/i',
            '/data:image\/svg\+xml/i',
            
            // Event handlers
            '/on\w+\s*=/i',
            
            // Funções perigosas
            '/alert\s*\(/i',
            '/confirm\s*\(/i',
            '/prompt\s*\(/i',
            '/eval\s*\(/i',
            '/exec\s*\(/i',
            '/system\s*\(/i',
            '/shell_exec\s*\(/i',
            
            // Objetos DOM
            '/document\./i',
            '/window\./i',
            '/localStorage\./i',
            '/sessionStorage\./i',
            '/cookie/i',
            
            // Tags perigosas
            '/<script/i',
            '/<\/script>/i',
            '/<iframe/i',
            '/<\/iframe>/i',
            '/<object/i',
            '/<\/object>/i',
            '/<embed/i',
            '/<\/embed>/i',
            '/<applet/i',
            '/<\/applet>/i',
            '/<meta/i',
            '/<\/meta>/i',
            '/<link/i',
            '/<\/link>/i',
            
            // SQL injection patterns básicos
            '/union\s+select/i',
            '/insert\s+into/i',
            '/drop\s+table/i',
            '/delete\s+from/i',
            '/update\s+.+\s+set/i',
            '/or\s+1=1/i',
        ];
        
        return preg_replace($patterns, '', $text);
    }
    
    private static function removeDangerousCharacters(string $text): string
    {
        // Remove caracteres que podem ser usados para injeção
        $dangerousChars = ['<', '>', '{', '}', '[', ']', '`', '$', '^', '|', '\\', '/', '%', ';', '"', "'"];
        $text = str_replace($dangerousChars, '', $text);
        
        return $text;
    }
    
    private static function normalizeSpaces(string $text): string
    {
        // Remove múltiplos espaços consecutivos
        return preg_replace('/\s+/', ' ', $text);
    }
}