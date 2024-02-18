<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BrowserInfoController extends Controller
{
    public function getBrowserInfo() {
        $browserInfo = $this->parseBrowserInfo();
        $ipAddress = $this->getIpAddress();
        
        return view('auth.login', compact('browserInfo', 'ipAddress'));
    }
    

    private function getIpAddress()
    {
        // Disable SSL verification (not recommended for production)
        $ipResponse = Http::timeout(30)->withoutVerifying()->get('http://api.seeip.org/jsonip?');

        $ipData = $ipResponse->json();

        $ipAddress = $ipData['ip'];

        return $ipAddress;
    }

    private function parseBrowserInfo()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        $browserInfo = $this->parseUserAgent($userAgent);

        return $browserInfo;
    }

    private function parseUserAgent($userAgent)
    {
        // Use regular expressions or any other method to parse user agent string
        // Here's a simple example using regular expressions to extract browser and version
        $browserInfo = ['browser' => 'Unknown', 'version' => ''];

        if (preg_match('/(MSIE|Trident)/i', $userAgent)) {
            $browserInfo['browser'] = 'Internet Explorer';
            preg_match('/(MSIE|rv:)\s?([\d\.]+)/i', $userAgent, $matches);
            if ($matches) {
                $browserInfo['version'] = $matches[2];
            }
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            $browserInfo['browser'] = 'Firefox';
            preg_match('/Firefox\/([\d\.]+)/i', $userAgent, $matches);
            if ($matches) {
                $browserInfo['version'] = $matches[1];
            }
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            $browserInfo['browser'] = 'Chrome';
            preg_match('/Chrome\/([\d\.]+)/i', $userAgent, $matches);
            if ($matches) {
                $browserInfo['version'] = $matches[1];
            }
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $browserInfo['browser'] = 'Safari';
            preg_match('/Version\/([\d\.]+)/i', $userAgent, $matches);
            if ($matches) {
                $browserInfo['version'] = $matches[1];
            }
        } elseif (preg_match('/Opera|OPR/i', $userAgent)) {
            $browserInfo['browser'] = 'Opera';
            if (preg_match('/(Opera|OPR)\/([\d\.]+)/i', $userAgent, $matches)) {
                $browserInfo['version'] = $matches[2];
            } elseif (preg_match('/Version\/([\d\.]+)/i', $userAgent, $matches)) {
                $browserInfo['version'] = $matches[1];
            }
        }

        return $browserInfo;
    }
}
