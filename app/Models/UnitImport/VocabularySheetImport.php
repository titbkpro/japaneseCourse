<?php


namespace App\Models\UnitImport;


use App\Exceptions\WebException;
use App\Models\Answer;
use App\Models\DataFile;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class VocabularySheetImport implements ToCollection
{

    public function collection(Collection $rows)
    {
//        DB::beginTransaction();
//        try {
            if ($rows) {

                $unitId = session('unit_id');
                $lesson = $this->getLessonData($rows);
                $lesson->unit_id = $unitId;

                $newLesson = Lesson::create($lesson->toArray());

                $lessonId = $newLesson->id;
                $exercise = new Exercise;
                $questions = Collection::make();

                foreach ($rows as $row) {
                    $rowData = $this->getRowData($row, $lessonId);
                    if ($rowData) {
                        if ($rowData instanceof Exercise) {
                            if (count($questions) > 0) {
                                $this->saveNewExercise($exercise, $questions);
                                empty($questions);
                            }
                            $exercise = $this->createNewExercise($rowData, $lessonId);
                        }

                        if ($rowData instanceof Question) {
                            $questions->add($rowData);
                        }
                    }
                }
            }
//            DB::commit();
//        } catch (Exception $e) {
//            dd($e);
//            DB::rollBack();
//            Log::error($e->getMessage());
//            throw new WebException('upload error');
//        }

    }

    private function getLessonData($rows) {
        $lesson = new Lesson;
        foreach ($rows as $row) {
            $firstCol = $row[0];
            switch ($firstCol) {
                case 'tên bài học':
                    $lesson->name = $row[1];
                    break;
                case 'mô tả':
                    $lesson->description = $row[1];
                    break;
                case 'video':
                    $lesson->video = $row[1];
                    break;
                case 'nội dung':
                    $lesson->content = $row[1];
                    break;
            }
        }
        return $lesson;
    }

    private function getRowData($row, $lessonId) {
        $firstCell = $row[0];
        if ($firstCell) {
            if ('Bài tập' == $firstCell) {
                return $this->createNewExercise($row, $lessonId);
            }
            if (is_int($firstCell)) {
                return $this->createNewQuestion($row);
            }
        }
    }

    private function createNewExercise($rowData, $lessonId) {
        $exercise = new Exercise;
        $exercise->lesson_id = $lessonId;
        $exercise->name = trim($rowData[1]);
        $exercise->content = trim($rowData[2]);
        return $exercise;
    }

    private function saveNewExercise($exercise, $questions) {
        $newExercise = Exercise::create($exercise->toArray());
        $newExercise->questions()->createMany($questions->toArray());
        return $newExercise;
    }

    private function createNewQuestion($row) {
        $question = new Question();
        $question->question = $row[1];

        $audioData = $row[7];
        if ($audioData) {
            $audio = DataFile::create([
                'url' => $audioData,
                'type' => DataFile::AUDIO,
                'name' => $audioData,
                'description' => $audioData,
            ]);
            $question->audio_id = $audio->id;
        }

        $imageData = $row[8];
        if ($imageData) {
            $image = DataFile::create([
                'url' => $imageData,
                'type' => DataFile::IMAGE,
                'name' => $imageData,
                'description' => $imageData,
            ]);
            $question->image_id = $image->id;
        }

        if ($question->question) {
            $newQuestion = Question::create($question->toArray());

            $this->createNewListAnswer($row, $newQuestion->id);

            return $newQuestion;
        }

    }

    private function createImageLink($data) {
    }

    private function createNewListAnswer($row, $questionId) {
        $rightAnswer = $row[6];
        $startAnswerIndex = 2;
        $answers = Collection::make();
        for ($answerNumber = 0; $answerNumber < 4; $answerNumber++) {
            $answer = new Answer();
            $answer->question_id = $questionId;
            $answer->answer = $row[$startAnswerIndex + $answerNumber];
            if (($rightAnswer - 1) == $answerNumber) {
                $answer->is_right_answer = true;
            } else {
                $answer->is_right_answer = false;
            }
            $answers->add(Answer::create($answer->toArray()));
        }
    }
}
