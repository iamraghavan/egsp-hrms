<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Mail\LoginNotification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\Norm;

class PageController extends Controller
{

    protected $redirectTo = '/dashboard';


    public function salaryCalcualte($emp_id)
    {
    }


    public function salaryView($emp_id)
    {

        if (Auth::check()) {

            $user = Auth::user();
            $employee = Employee::where('temp_id', $emp_id)->first();
            $designationDetails = Norm::where('designationID', $employee->designationID)->first();

            $employeeData = $designationDetails;


            if ($user) {
                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();



                return view('pages.salary-calculate', ['userName' => $user->name, 'employee' => $employee, 'employeeData' => $employeeData], compact('ipAddress'));
            }
        }

        return abort(403, 'Unauthorized');
    }


    public function login_page()
    {
        return view('auth.login');
    }

    public function verifyLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials, $request->has('remember'))) {

                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();

                Mail::to($credentials['email'])->send(new LoginNotification($credentials['email'], $ipAddress, $browserInfo, $loginTimestamp));



                return redirect()->intended(route('pages.dashboard'));
            }

            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('login')->withErrors($e->errors())->withInput();
        }
    }



    public function dashboard()
    {

        if (Auth::check()) {

            $user = Auth::user();

            if ($user) {
                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();


                // Send login notification email

                return view('pages.dashboard', ['userName' => $user->name], compact('ipAddress'));
            }
        }

        return abort(403, 'Unauthorized');
    }

    public function add_employee()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user) {
                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();

                $norms = DB::table('norms')->get();
                return view('pages.add-employee', ['userName' => $user->name], compact('ipAddress', 'norms'));
            }
        }

        return abort(403, 'Unauthorized');
    }

    public function editEmployee($emp_id)
    {

        $employee = Employee::where('temp_id', $emp_id)->first();
        if (Auth::check()) {
            $user = Auth::user();

            if ($user) {
                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();
                $norms = DB::table('norms')->get();
                return view('pages.edit', ['userName' => $user->name, 'employee' => $employee], compact('ipAddress', 'norms'));
            }
        }

        return abort(403, 'Unauthorized');


        // $employee = Employee::where('temp_id', $emp_id)->first();

    }

    public function calculate_salary()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user) {
                $browserInfo = $this->parseBrowserInfo();
                $ipAddress = $this->getIpAddress();
                $loginTimestamp = $this->getLoginTimestamp();
                $employees = Employee::latest()->paginate(10);
                return view('pages.calculate', ['employees' => $employees], ['userName' => $user->name, 'ipAddress' => $ipAddress]);
            }
        }





        return abort(403, 'Unauthorized');
    }





    public function getBrowserInfo()
    {
        $browserInfo = $this->parseBrowserInfo();
        $ipAddress = $this->getIpAddress();


        return view('auth.login', compact('browserInfo', 'ipAddress'));
    }


    private function getLoginTimestamp()
    {
        return Carbon::now()->toDateTimeString();
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
