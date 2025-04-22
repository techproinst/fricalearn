<?php

namespace App\Services;

use App\DataTransferObjects\Students\StudentDTO;
use App\DataTransferObjects\Students\UpdateStudentDTO;
use App\Enums\ContinentGroup;
use App\Helpers\AppHelper;
use App\Helpers\RepositoryHelper;
use App\Http\Requests\UpdateStudentRequest;
use App\Interfaces\StudentInterface;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Log;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public StudentInterface $studentInterface,
        public LocationService $locationService,
        public RepositoryHelper $repositoryHelper,
        public AppHelper $appHelper,
    ) {}


    public function handleCreateStudent($request)
    {
        $studentData = $this->mapStudentFormData($request->validated());

        return $this->studentInterface->storeStudent($studentData);
    }

    public function handleCreateStudentCourseLevel($studentData, $courseId, $courseLevel)
    {

        return $this->studentInterface->storeStudentCourseLevel($studentData, $courseId, $courseLevel);
    }

    public function mapStudentFormData($request)
    {
        return StudentDTO::fromArray($request)->toArray();
    }

    public function getStudentPaymentAmount($studentId)
    {
        $studentLevel = $this->getStudentCourseLevel($studentId);

        if (!$studentLevel) {
            Log::warning("No unpaid course level found for student ID : {$studentId}");
            return null;
        }

        $courseLevelDetails = $this->getCourseLevelDetails($studentLevel);

        if (!$courseLevelDetails) {

            Log::warning("Course level details not found for course ID: {$studentLevel->course_id} and level ID: {$studentLevel->course_level_id}");

            return null;
        }


        return $this->determineUserContinent($studentId, $courseLevelDetails);
    }


    public function getStudentCourseLevel($studentId)
    {
        return $this->studentInterface->getStudentCourseLevel($studentId);
    }

    public function getCourseLevelDetails($studentLevel)
    {
        return $this->studentInterface->getCourseLevelDetails($studentLevel);
    }

    public function determineUserContinent($studentId, $courseLevelDetails)
    {
        $data = $this->locationService->getUserContinent();

        $continent = $this->locationService->handleGetContinent($data, [ContinentGroup::class, 'mapContinentToPaymentSchedule']);

        if (!$continent) {
            Log::warning("Continent could not be determined for student ID: {$studentId}");
            return null;
        }

        $amounts = json_decode($courseLevelDetails->price, true);

        return  [$amounts, $continent];
    }


    public  function getStudentInfo($student)
    {
        $studentInfo = $this->studentInterface->getStudentInfo($student);

        if (!$studentInfo) {
            Log::info(message: "No student Data found for student with this id: $student->id");
            return null;
        }

        return $studentInfo;
    }

    public function handleCheckStudentSchedule($studentId)
    {
        return $this->repositoryHelper->getStudentSchedule($studentId);
    }

    public function handleUpdateStudentProfile(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->validated();

        $profilePhoto = $this->appHelper->handleFileUpload($request, 'profile_photo');

        if (!$profilePhoto) {
            throw new Exception('Profile photo upload failed');
        }

        $dto = $this->mapValidatedData($validatedData, $profilePhoto);

        $this->studentInterface->updateStudent(student:$student, dto:$dto);
    }

    public function mapValidatedData(array $validatedData, string $profilePhoto)
    {
        return new UpdateStudentDTO(
            name: $validatedData['name'],
            birthday: $validatedData['birthday'],
            ageRange: $validatedData['age_range'],
            profilePhoto: $profilePhoto
        );
    }
}
