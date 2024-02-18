<?php

namespace App\Traits;

use App\Models\CandidateDetails;
use App\Models\CandidateExperiences;
use DateTime;
use Exception;
use Carbon\Carbon;
use App\Models\Qualification;
use App\Models\BranchEmployee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\BranchEmployeeTeamDetail;

trait CommonFunctions
{
    protected string $controller_name;

    public function __construct()
    {
        $this->controller_name = 'CommonFunctions';
    }

    public function generateName($image_array, $image_type): string
    {
        try {
            $name = uniqid() . '_' . $image_type . '_' . time() . '.' . strtolower($image_array->getClientOriginalExtension());

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'generateName');
            $name = uniqid() . '_' . $image_type . '_' . time() . '.jpeg';
        }
        return $name;
    }

    public function generatePdfName($image_type): string
    {
        $function_name = 'generatePdfName';
        try {
            $name = uniqid() . '_' . $image_type . '_' . time() . '.pdf';

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, $function_name);
            $name = uniqid() . '_' . $image_type . '_' . time() . '.pdf';
        }
        return $name;
    }

    public function saveFileByPath($image_array, $img, $original_path): bool
    {
        try {
            $result = $image_array->move($original_path, $img);
            if ($result) {
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'saveFileByPath');
            return false;
        }
    }

    public function saveFileToS3ByPath($file_path, $file_name, $folder_name): bool
    {
        try {
            $aws_bucket = config('constants.AWS_BUCKET_ROOT_DIR');
            $disk = Storage::disk('s3');

            if ((($this->checkFileExist($file_path . $file_name)) != 0)) {
                $resource_targetFile = "$aws_bucket/$folder_name/" . $file_name;
                $result = $disk->put($resource_targetFile, file_get_contents($file_path . $file_name));

                unlink($file_path . $file_name);
                return $result;

            } else {
                logInfo($this->controller_name, 'saveFileToS3ByPath', ['file not exist' => $file_path . $file_name]);
                return false;
            }

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'saveFileToS3ByPath');
            return false;
        }

    }

    public function saveFileByStorage($image_array, $original_path, $img, $disk = null): bool
    {
        try {
            return Storage::disk($disk)->putFileAs($original_path, $image_array, $img);

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'saveFileByPath');
            return false;
        }
    }

    public function deleteFileByStorage($original_path, $img, $disk = null): bool
    {
        try {
            if ($this->checkFileExistByStorage($original_path, $img, $disk) == 1) {
                return Storage::disk($disk)->delete($original_path . $img);
            } else {
                return false;
            }

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'deleteFileByStorage');
            return false;
        }
    }

    public function checkFileExistByStorage($original_path, $img, $disk = null): int
    {
        try {
            if (Storage::disk($disk)->exists($original_path . $img)) {
                $response = 1;
            } else {
                $response = 0;
            }
        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'checkFileExist');
            $response = 0;
        }
        return $response;
    }

    public function getFilePathByStorage($original_path, $img, $disk = null): string
    {
        try {
            return Storage::disk($disk)->url($original_path . $img);

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getFilePathByStorage');
            return "";
        }
    }

    public function downloadFilePathByStorage($original_path, $img, $downloaded_file_name, $headers = [], $disk = null)
    {
        try {
            return Storage::disk($disk)->download($original_path . $img, $downloaded_file_name, $headers);

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'downloadFilePathByStorage');
            return "";
        }
    }

    public function unlinkFileFromLocalStorage($original_image_path): bool
    {
        try {
            if ($this->checkFileExist($original_image_path) != 0) {
                return unlink($original_image_path);
            } else {
                logInfo($this->controller_name, 'unlinkFileFromLocalStorage', ['file not exist' => $original_image_path]);
                return false;
            }

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'unlinkFileFromLocalStorage');
            return false;
        }
    }

    public function checkFileExist($file_path): int
    {
        try {
            if (file_exists($file_path)) {
                $response = 1;
            } else {
                $response = 0;
            }

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'checkFileExist');
            $response = 0;
        }
        return $response;
    }

    public function getTeamLeaderByBranchFunction($branch_id)
    {
        try {
            $result = BranchEmployee::where('branch_id', $branch_id)->where('role_id', config('constants.role_id.branch_employee.candidate_team_leader'))->where('status', '1')->select('id', 'name')->get()->toArray();
            return ['status' => config('constants.status_code_for_success'), 'message' => 'Team leader fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getTeamLeaderByBranchFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getTeamLeaderByBranchPluckFunction($branch_id)
    {
        try {
            $result = BranchEmployee::where('branch_id', $branch_id)->where('role_id', config('constants.role_id.branch_employee.candidate_team_leader'))->where('status', '1')->pluck('name', 'id')->toArray();
            return ['status' => config('constants.status_code_for_success'), 'message' => 'Team leader fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getTeamLeaderByBranchPluckFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getRecruiterTeamLeaderByBranchFunction($branch_id)
    {
        try {
            $result = BranchEmployee::where('branch_id', $branch_id)->where('role_id', config('constants.role_id.branch_employee.recruiter_team_leader'))->where('status', '1')->select('id', 'name')->get()->toArray();
            return ['status' => config('constants.status_code_for_success'), 'message' => 'Team leader fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getRecruiterTeamLeaderByBranchFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getRecruiterTeamLeaderByBranchPluckFunction($branch_id)
    {
        try {
            $result = BranchEmployee::where('branch_id', $branch_id)->where('role_id', config('constants.role_id.branch_employee.recruiter_team_leader'))->where('status', '1')->pluck('name', 'id')->toArray();
            return ['status' => config('constants.status_code_for_success'), 'message' => 'Team leader fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getRecruiterTeamLeaderByBranchPluckFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getCounsellorByTeamLeaderFunction($tl_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.counsellor_id', '=', 'bhrs.id')
                ->where('betds.team_leader_id', $tl_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->select('bhrs.id', 'bhrs.name')
                ->groupBy('bhrs.id')
                ->get()->toArray();

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Counsellor fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getCounsellorByTeamLeaderFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getCounsellorByTeamLeaderPluckFunction($tl_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.counsellor_id', '=', 'bhrs.id')
                ->where('betds.team_leader_id', $tl_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->groupBy('bhrs.id')
                ->pluck('bhrs.name', 'bhrs.id');

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Counsellor fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getTeamLeaderByBranchPluckFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getExecutiveByCounsellorFunction($counsellor_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.executive_id', '=', 'bhrs.id')
                ->where('betds.counsellor_id', $counsellor_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->groupBy('bhrs.id')
                ->get()->toArray();

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Executive fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getExecutiveByCounsellorFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getExecutiveByCounsellorPluckFunction($counsellor_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.executive_id', '=', 'bhrs.id')
                ->where('betds.counsellor_id', $counsellor_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->groupBy('bhrs.id')
                ->pluck('bhrs.name', 'bhrs.id');

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Executive fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getExecutiveByCounsellorPluckFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getTraineeByExecutiveFunction($executive_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.trainee_id', '=', 'bhrs.id')
                ->where('betds.executive_id', $executive_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->groupBy('bhrs.id')
                ->get()->toArray();

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Counsellor fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getExecutiveByCounsellorFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getTraineeByExecutivePluckFunction($executive_id)
    {
        try {
            $result = BranchEmployeeTeamDetail::from('branch_employee_team_details as betds')
                ->join('branch_hrs as bhrs', 'betds.trainee_id', '=', 'bhrs.id')
                ->where('betds.executive_id', $executive_id)
                ->where('betds.status', 1)
                ->where('bhrs.status', 1)
                ->groupBy('bhrs.id')
                ->pluck('bhrs.name', 'bhrs.id');

            return ['status' => config('constants.status_code_for_success'), 'message' => 'Counsellor fetched successfully.', 'data' => $result];

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getTraineeByExecutivePluckFunction');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    function convertDateFormatFirstDay($dateString)
    {
        try {
            $date = Carbon::createFromFormat('M-Y', $dateString)->firstOfMonth();

            $formattedDate = $date->format('Y-m-d');

            return $formattedDate;

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'convertDateFormatFirstDay');
            return null;
            // ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    function convertDateFormatLastDay($dateString)
    {
        try {
            $date = Carbon::createFromFormat('M-Y', $dateString)->lastOfMonth();

            $formattedDate = $date->format('Y-m-d');

            return $formattedDate;

        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'convertDateFormatLastDay');
            // return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
            return null;
        }
    }

    public function convertDateToMonth(): ?string
    {
        try {
            $candidate_id = auth('candidateApi')->id();
            $check_dol_count = CandidateExperiences::where(['candidate_id' => $candidate_id, 'status' => 1])->select('doj as date_of_join', 'dol as date_of_left')->whereNull('dol')->count();
            if ($check_dol_count >= 2) {
                $dol_not_null_record = CandidateExperiences::where(['candidate_id' => $candidate_id, 'status' => 1])->whereNotNull('dol')->select('id', 'doj as date_of_join', 'dol as date_of_left')->get();
                $dol_null_record = CandidateExperiences::where(['candidate_id' => $candidate_id, 'status' => 1])->whereNull('dol')->select('id', 'doj as date_of_join', 'dol as date_of_left', 'created_at')->orderBy('created_at', 'desc')->first();
                $candidateExperience = $dol_not_null_record->merge([$dol_null_record]);
            } else {
                $candidateExperience = CandidateExperiences::where(['candidate_id' => $candidate_id, 'status' => 1])->select('doj as date_of_join', 'dol as date_of_left')->get();
            }
            $total_exeperience = 0;
            if ($candidateExperience) {
                foreach ($candidateExperience as $experience) {
                    $createdAt = Carbon::parse($experience->date_of_join);
                    $currentDate = Carbon::parse(date('Y-m-d'));
                    if ($experience->date_of_left) {
                        $currentDate = Carbon::parse($experience->date_of_left);
                    }
                    $total_exeperience += $createdAt->diffInMonths($currentDate);
                }
                $store_total_experience = CandidateDetails::where('candidate_id', $candidate_id)->first();
                return $store_total_experience->update([
                    'total_exeprience' => $total_exeperience
                ]);
            }
        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'convertDateToMonth');
            return null;
        }
    }

    public function generateRandomString($length = 6)
    {
        try {
            //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'generateRandomString');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }

    public function getCandidateTotalExperience($total_exeprience)
    {
        try {
            // $years = 0;
            // $months = 0;

            // preg_match('/(\d+)Y/', $total_exeprience, $yearMatches);
            // preg_match('/(\d+)M/', $total_exeprience, $monthMatches);

            // if (isset($yearMatches[1])) {
            //     $years = $yearMatches[1];
            // }

            // if (isset($monthMatches[1])) {
            //     $months = $monthMatches[1];
            // }
            // $total_month = ($years * 12) + $months;
            // $total_month = $total_exeprience;
            // $experiences = Qualification::where('type',2)->select('id','name')->get()->toArray();
            // $experiences_id = 0;
            // foreach($experiences as $key => $value){

            //     // $jobexpiriance = explode('-', $value['name']);
            //     // $firstexpiriance = (int) filter_var($jobexpiriance[0], FILTER_SANITIZE_NUMBER_INT);
            //     // $secondexpiriance = isset($jobexpiriance[1]) ? (int) filter_var($jobexpiriance[1], FILTER_SANITIZE_NUMBER_INT) : $firstexpiriance;
            //     // if(!isset($jobexpiriance[1])){
            //     //     $firstexpiriance = 0;
            //     // }
            //     // $minMonth = $firstexpiriance * 12;
            //     // $maxMonth = $secondexpiriance * 12;

            //     if($minMonth <= $total_month && $total_month < $maxMonth){
            //         $experiences_id = $value['id'];
            //         break;
            //     } else if(84 <= $total_month){
            //         $experiences_id = $value['id'];
            //     }
            // }
            $experiences_id = Qualification::where('type', 2)->select('id')
                ->where('min_month', '=<', $total_exeprience)
                ->where('max_month', '>=', $total_exeprience);
            return $experiences_id;
        } catch (Exception $e) {
            logCatchException($e, $this->controller_name, 'getCandidateTotalExperience');
            return ['status' => config('constants.status_code_for_exception_error'), 'message' => config('constants.common_error_message'), 'data' => []];
        }
    }
}
