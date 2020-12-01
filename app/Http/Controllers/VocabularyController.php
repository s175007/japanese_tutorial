<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class VocabularyController extends Controller
{
    private $itemPerPage = 20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabularies = Vocabulary::with('lesson')->paginate($this->itemPerPage);
        // return $vocabularies;
        return view('admin.vocabularies.index', compact('vocabularies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lessons = Lesson::all();
        $books = Book::all();
        $categories = Category::all();
        return view('admin.vocabularies.create', compact('lessons', 'books', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Vocabulary::$create_rule)->validate();

        $vocabulary = new Vocabulary();

        $vocabulary->lesson_id = $request->lesson_id;
        $vocabulary->kanji = $request->kanji;
        $vocabulary->hiragana = $request->hiragana;
        $vocabulary->mean = $request->mean;

        // return $vocabulary;
        $vocabulary->save();

        return Redirect::route('admin.vocabularies.index')->with('success', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function show(Vocabulary $vocabulary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function edit(Vocabulary $id)
    {
        $vocabulary = Vocabulary::find($id);
        $lessons = Lesson::all();
        // return $book;
        if (!empty($vocabulary)) {
            return view('admin.vocabularies.edit')->with([
                'lessons' => $lessons,
                'vocabulary' => $vocabulary
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), Vocabulary::$create_rule)->validate();

        $vocabulary = Vocabulary::find($id);
        // return $request->all();
        if(($request->lesson_id) == 0){
            return $vocabulary;
        }
        return $vocabulary;


        if (!empty($vocabulary)) {

            

            // return $vocabulary;
            $vocabulary->save();
            return $vocabulary;
            return Redirect::route('admin.vocabularies.index')->with('success', 'Tạo thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vocabulary  $vocabulary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vocabulary $vocabulary)
    {
        //
    }
}
