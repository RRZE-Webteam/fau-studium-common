<?php

declare(strict_types=1);

namespace Fau\DegreeProgram\Common\Application;

use Fau\DegreeProgram\Common\Domain\AdmissionRequirements;
use Fau\DegreeProgram\Common\Domain\Content;
use Fau\DegreeProgram\Common\Domain\Degree;
use Fau\DegreeProgram\Common\Domain\DegreeProgram;
use Fau\DegreeProgram\Common\Domain\DegreeProgramId;
use Fau\DegreeProgram\Common\Domain\DegreeProgramIds;
use Fau\DegreeProgram\Common\Domain\Image;
use Fau\DegreeProgram\Common\Domain\MultilingualLink;
use Fau\DegreeProgram\Common\Domain\MultilingualLinks;
use Fau\DegreeProgram\Common\Domain\MultilingualList;
use Fau\DegreeProgram\Common\Domain\MultilingualString;
use Fau\DegreeProgram\Common\Domain\NumberOfStudents;
use Fau\DegreeProgram\Common\LanguageExtension\ArrayOfStrings;
use JsonSerializable;

final class DegreeProgramViewRaw implements JsonSerializable
{
    private function __construct(
        private DegreeProgramId $id,
        private Image $featuredImage,
        private Image $teaserImage,
        private MultilingualString $title,
        private MultilingualString $subtitle,
        private int $standardDuration,
        private bool $feeRequired,
        private MultilingualList $start,
        private NumberOfStudents $numberOfStudents,
        private MultilingualString $teachingLanguage,
        private MultilingualList $attributes,
        private Degree $degree,
        private MultilingualLink $faculty,
        private MultilingualString $location,
        private MultilingualList $subjectGroups,
        private ArrayOfStrings $videos,
        private MultilingualString $metaDescription,
        private Content $content,
        private AdmissionRequirements $admissionRequirements,
        private MultilingualString $contentRelatedMasterRequirements,
        private string $applicationDeadlineWinterSemester,
        private string $applicationDeadlineSummerSemester,
        private MultilingualString $detailsAndNotes,
        private MultilingualString $languageSkills,
        private string $languageSkillsHumanitiesFaculty,
        private MultilingualLink $germanLanguageSkillsForInternationalStudents,
        private MultilingualLink $startOfSemester,
        private MultilingualLink $semesterDates,
        private MultilingualLink $examinationsOffice,
        private MultilingualLink $examinationRegulations,
        private string $moduleHandbook,
        private MultilingualString $url,
        private MultilingualLink $department,
        private MultilingualLink $studentAdvice,
        private MultilingualLink $subjectSpecificAdvice,
        private MultilingualLink $serviceCenters,
        private string $studentRepresentatives,
        private MultilingualLink $semesterFee,
        private MultilingualString $degreeProgramFees,
        private MultilingualLink $abroadOpportunities,
        private MultilingualList $keywords,
        private MultilingualLinks $areaOfStudy,
        private DegreeProgramIds $combinations,
        private DegreeProgramIds $limitedCombinations,
    ) {
    }

    public static function fromDegreeProgram(DegreeProgram $degreeProgram): self
    {
        $data = $degreeProgram->asArray();
        return new self(
            $data[DegreeProgram::ID],
            $data[DegreeProgram::FEATURED_IMAGE],
            $data[DegreeProgram::TEASER_IMAGE],
            $data[DegreeProgram::TITLE],
            $data[DegreeProgram::SUBTITLE],
            $data[DegreeProgram::STANDARD_DURATION],
            $data[DegreeProgram::FEE_REQUIRED],
            $data[DegreeProgram::START],
            $data[DegreeProgram::NUMBER_OF_STUDENTS],
            $data[DegreeProgram::TEACHING_LANGUAGE],
            $data[DegreeProgram::ATTRIBUTES],
            $data[DegreeProgram::DEGREE],
            $data[DegreeProgram::FACULTY],
            $data[DegreeProgram::LOCATION],
            $data[DegreeProgram::SUBJECT_GROUPS],
            $data[DegreeProgram::VIDEOS],
            $data[DegreeProgram::META_DESCRIPTION],
            $data[DegreeProgram::CONTENT],
            $data[DegreeProgram::ADMISSION_REQUIREMENTS],
            $data[DegreeProgram::CONTENT_RELATED_MASTER_REQUIREMENTS],
            $data[DegreeProgram::APPLICATION_DEADLINE_WINTER_SEMESTER],
            $data[DegreeProgram::APPLICATION_DEADLINE_SUMMER_SEMESTER],
            $data[DegreeProgram::DETAILS_AND_NOTES],
            $data[DegreeProgram::LANGUAGE_SKILLS],
            $data[DegreeProgram::LANGUAGE_SKILLS_HUMANITIES_FACULTY],
            $data[DegreeProgram::GERMAN_LANGUAGE_SKILLS_FOR_INTERNATIONAL_STUDENTS],
            $data[DegreeProgram::START_OF_SEMESTER],
            $data[DegreeProgram::SEMESTER_DATES],
            $data[DegreeProgram::EXAMINATIONS_OFFICE],
            $data[DegreeProgram::EXAMINATION_REGULATIONS],
            $data[DegreeProgram::MODULE_HANDBOOK],
            $data[DegreeProgram::URL],
            $data[DegreeProgram::DEPARTMENT],
            $data[DegreeProgram::STUDENT_ADVICE],
            $data[DegreeProgram::SUBJECT_SPECIFIC_ADVICE],
            $data[DegreeProgram::SERVICE_CENTERS],
            $data[DegreeProgram::STUDENT_REPRESENTATIVES],
            $data[DegreeProgram::SEMESTER_FEE],
            $data[DegreeProgram::DEGREE_PROGRAM_FEES],
            $data[DegreeProgram::ABROAD_OPPORTUNITIES],
            $data[DegreeProgram::KEYWORDS],
            $data[DegreeProgram::AREA_OF_STUDY],
            $data[DegreeProgram::COMBINATIONS],
            $data[DegreeProgram::LIMITED_COMBINATIONS],
        );
    }

    public function asArray(): array
    {
        return [
            DegreeProgram::ID => $this->id->asInt(),
            DegreeProgram::FEATURED_IMAGE => $this->featuredImage->asArray(),
            DegreeProgram::TEASER_IMAGE => $this->teaserImage->asArray(),
            DegreeProgram::TITLE => $this->title->asArray(),
            DegreeProgram::SUBTITLE => $this->subtitle->asArray(),
            DegreeProgram::STANDARD_DURATION => $this->standardDuration,
            DegreeProgram::FEE_REQUIRED => $this->feeRequired,
            DegreeProgram::START => $this->start,
            DegreeProgram::NUMBER_OF_STUDENTS => $this->numberOfStudents->asArray(),
            DegreeProgram::TEACHING_LANGUAGE => $this->teachingLanguage->asArray(),
            DegreeProgram::ATTRIBUTES => $this->attributes->asArray(),
            DegreeProgram::DEGREE => $this->degree->asArray(),
            DegreeProgram::FACULTY => $this->faculty->asArray(),
            DegreeProgram::LOCATION => $this->location->asArray(),
            DegreeProgram::SUBJECT_GROUPS => $this->subjectGroups->asArray(),
            DegreeProgram::VIDEOS => $this->videos->getArrayCopy(),
            DegreeProgram::META_DESCRIPTION => $this->metaDescription->asArray(),
            DegreeProgram::CONTENT => $this->content->asArray(),
            DegreeProgram::ADMISSION_REQUIREMENTS => $this->admissionRequirements->asArray(),
            DegreeProgram::CONTENT_RELATED_MASTER_REQUIREMENTS =>
                $this->contentRelatedMasterRequirements->asArray(),
            DegreeProgram::APPLICATION_DEADLINE_WINTER_SEMESTER => $this->applicationDeadlineWinterSemester,
            DegreeProgram::APPLICATION_DEADLINE_SUMMER_SEMESTER => $this->applicationDeadlineSummerSemester,
            DegreeProgram::DETAILS_AND_NOTES => $this->detailsAndNotes->asArray(),
            DegreeProgram::LANGUAGE_SKILLS => $this->languageSkills->asArray(),
            DegreeProgram::LANGUAGE_SKILLS_HUMANITIES_FACULTY =>
                $this->languageSkillsHumanitiesFaculty,
            DegreeProgram::GERMAN_LANGUAGE_SKILLS_FOR_INTERNATIONAL_STUDENTS =>
                $this->germanLanguageSkillsForInternationalStudents->asArray(),
            DegreeProgram::START_OF_SEMESTER => $this->startOfSemester->asArray(),
            DegreeProgram::SEMESTER_DATES => $this->semesterDates->asArray(),
            DegreeProgram::EXAMINATIONS_OFFICE => $this->examinationsOffice->asArray(),
            DegreeProgram::EXAMINATION_REGULATIONS => $this->examinationRegulations->asArray(),
            DegreeProgram::MODULE_HANDBOOK => $this->moduleHandbook,
            DegreeProgram::URL => $this->url->asArray(),
            DegreeProgram::DEPARTMENT => $this->department->asArray(),
            DegreeProgram::STUDENT_ADVICE => $this->studentAdvice->asArray(),
            DegreeProgram::SUBJECT_SPECIFIC_ADVICE => $this->subjectSpecificAdvice->asArray(),
            DegreeProgram::SERVICE_CENTERS => $this->serviceCenters->asArray(),
            DegreeProgram::STUDENT_REPRESENTATIVES => $this->studentRepresentatives,
            DegreeProgram::SEMESTER_FEE => $this->semesterFee->asArray(),
            DegreeProgram::DEGREE_PROGRAM_FEES => $this->degreeProgramFees->asArray(),
            DegreeProgram::ABROAD_OPPORTUNITIES => $this->abroadOpportunities->asArray(),
            DegreeProgram::KEYWORDS => $this->keywords->asArray(),
            DegreeProgram::AREA_OF_STUDY => $this->areaOfStudy->asArray(),
            DegreeProgram::COMBINATIONS => $this->combinations->asArray(),
            DegreeProgram::LIMITED_COMBINATIONS => $this->limitedCombinations->asArray(),
        ];
    }

    public function jsonSerialize()
    {
        return $this->asArray();
    }

    public function id(): DegreeProgramId
    {
        return $this->id;
    }

    public function featuredImage(): Image
    {
        return $this->featuredImage;
    }

    public function teaserImage(): Image
    {
        return $this->teaserImage;
    }

    public function title(): MultilingualString
    {
        return $this->title;
    }

    public function subtitle(): MultilingualString
    {
        return $this->subtitle;
    }

    public function standardDuration(): int
    {
        return $this->standardDuration;
    }

    public function isFeeRequired(): bool
    {
        return $this->feeRequired;
    }

    public function start(): MultilingualList
    {
        return $this->start;
    }

    public function numberOfStudents(): NumberOfStudents
    {
        return $this->numberOfStudents;
    }

    public function teachingLanguage(): MultilingualString
    {
        return $this->teachingLanguage;
    }

    public function attributes(): MultilingualList
    {
        return $this->attributes;
    }

    public function degree(): Degree
    {
        return $this->degree;
    }

    public function faculty(): MultilingualLink
    {
        return $this->faculty;
    }

    public function location(): MultilingualString
    {
        return $this->location;
    }

    public function subjectGroups(): MultilingualList
    {
        return $this->subjectGroups;
    }

    public function videos(): ArrayOfStrings
    {
        return $this->videos;
    }

    public function metaDescription(): MultilingualString
    {
        return $this->metaDescription;
    }

    public function content(): Content
    {
        return $this->content;
    }

    public function admissionRequirements(): AdmissionRequirements
    {
        return $this->admissionRequirements;
    }

    public function contentRelatedMasterRequirements(): MultilingualString
    {
        return $this->contentRelatedMasterRequirements;
    }

    public function applicationDeadlineWinterSemester(): string
    {
        return $this->applicationDeadlineWinterSemester;
    }

    public function applicationDeadlineSummerSemester(): string
    {
        return $this->applicationDeadlineSummerSemester;
    }

    public function detailsAndNotes(): MultilingualString
    {
        return $this->detailsAndNotes;
    }

    public function languageSkills(): MultilingualString
    {
        return $this->languageSkills;
    }

    public function languageSkillsHumanitiesFaculty(): string
    {
        return $this->languageSkillsHumanitiesFaculty;
    }

    public function germanLanguageSkillsForInternationalStudents(): MultilingualLink
    {
        return $this->germanLanguageSkillsForInternationalStudents;
    }

    public function startOfSemester(): MultilingualLink
    {
        return $this->startOfSemester;
    }

    public function semesterDates(): MultilingualLink
    {
        return $this->semesterDates;
    }

    public function examinationsOffice(): MultilingualLink
    {
        return $this->examinationsOffice;
    }

    public function examinationRegulations(): MultilingualLink
    {
        return $this->examinationRegulations;
    }

    public function moduleHandbook(): string
    {
        return $this->moduleHandbook;
    }

    public function url(): MultilingualString
    {
        return $this->url;
    }

    public function department(): MultilingualLink
    {
        return $this->department;
    }

    public function studentAdvice(): MultilingualLink
    {
        return $this->studentAdvice;
    }

    public function subjectSpecificAdvice(): MultilingualLink
    {
        return $this->subjectSpecificAdvice;
    }

    public function serviceCenters(): MultilingualLink
    {
        return $this->serviceCenters;
    }

    public function studentRepresentatives(): string
    {
        return $this->studentRepresentatives;
    }

    public function semesterFee(): MultilingualLink
    {
        return $this->semesterFee;
    }

    public function degreeProgramFees(): MultilingualString
    {
        return $this->degreeProgramFees;
    }

    public function abroadOpportunities(): MultilingualLink
    {
        return $this->abroadOpportunities;
    }

    public function keywords(): MultilingualList
    {
        return $this->keywords;
    }

    public function areaOfStudy(): MultilingualLinks
    {
        return $this->areaOfStudy;
    }

    public function combinations(): DegreeProgramIds
    {
        return $this->combinations;
    }

    public function limitedCombinations(): DegreeProgramIds
    {
        return $this->limitedCombinations;
    }
}
