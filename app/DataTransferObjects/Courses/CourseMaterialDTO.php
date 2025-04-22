<?php

namespace App\DataTransferObjects\Courses;

readonly class CourseMaterialDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct
    (public readonly int $course_id,
     public readonly int $course_level_id,
     public readonly string $title,
     public readonly string $description,
     public readonly string $material,
     )
    {
        
    }

    public static function fromRequest(array $validatedData): self
    {
         return new self(
            course_id: $validatedData['course_id'],
            course_level_id: $validatedData['course_level_id'],
            title: $validatedData['title'],
            description: $validatedData['description'],
            material: $validatedData['material'],

         );
    }

    public function toArray()
    {
        return [
            'course_id' => $this->course_id,
            'course_level_id' => $this->course_level_id,
            'title' => $this->title,
            'description' => $this->description,
            'material' => $this->material,

        ];
    }
}
