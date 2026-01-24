<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CRM\CertificateCrm as CRMCertificateCrm;
use Illuminate\Http\Request;

class CertificateVerificationController extends Controller
{
    public function index(Request $request)
    {
        $result = null;
        $inputNumber = $request->query('key'); // grab the ?key= value

        if ($inputNumber) {
            $inputNumber = strtoupper(trim($inputNumber));

            // 1️⃣ must start with BES
            if (str_starts_with($inputNumber, 'BES')) {

                $number = (int) substr($inputNumber, 3);

                if ($number >= 3000) {
                    $certificateId = $number - 3000;

                    $certificate = CRMCertificateCrm::on('crm_database')
                        ->with([
                            'enrolledCourse.course',
                            'enrolledCourse.student',
                        ])->find($certificateId);


                    if ($certificate) {
                        $result = $certificate;
                    }
                }
            }
        }

        return view('certificate.verify', [
            'result' => $result,
            'inputNumber' => $inputNumber,
        ]);
    }
}
