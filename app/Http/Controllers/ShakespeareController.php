<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class ShakespeareController extends Controller
{
    public function getWorks()
    {
        $works = DB::table('shakespeare_works')->select('work_id', 'work_long_title')->get();
        return response()->json($works);
    }

    public function fetchParagraphs(Request $request)
{
    $token = $request->input('token');
    $work_id = $request->input('work');
    $act_num = $request->input('act');
    $scene_num = $request->input('scene');

    // Validate the token
    $token = PersonalAccessToken::findToken($token);
    if (!$token || $token->tokenable->id !== $request->user()->id) {
        return response()->json(['error' => 'Invalid API token'], 403);
    }

    if ($work_id && $act_num && $scene_num) {
        $paragraphs = DB::table('shakespeare_paragraphs')
            ->join('shakespeare_scene_locations', function($join) {
                $join->on('shakespeare_scene_locations.work_id', '=', 'shakespeare_paragraphs.par_work_id')
                     ->on('shakespeare_scene_locations.act', '=', 'shakespeare_paragraphs.par_act')
                     ->on('shakespeare_scene_locations.scene', '=', 'shakespeare_paragraphs.par_scene');
            })
            ->leftJoin('shakespeare_characters', 'shakespeare_paragraphs.par_char_id', '=', 'shakespeare_characters.char_id')
            ->where('par_work_id', $work_id)
            ->where('par_act', $act_num)
            ->where('par_scene', $scene_num)
            ->orderBy('par_act', 'asc')
            ->orderBy('par_scene', 'asc')
            ->orderBy('par_number', 'asc')
            ->select(
                'shakespeare_paragraphs.*',
                'shakespeare_characters.char_name'
            )
            ->get();

        $work = DB::table('shakespeare_works')->where('work_id', $work_id)->first();
        $ipAddress = $request->ip();
        $preview = $paragraphs->first()->par_text ?? '';

        // Save the search data
        DB::table('user_searches')->insert([
            'user_id' => $request->user()->id,
            'work_title' => $work->work_long_title,
            'act' => $act_num,
            'scene' => $scene_num,
            'ip_address' => $ipAddress,
            'preview' => substr($preview, 0, 100) . '...',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json($paragraphs);
    }

    return response()->json([]);
}
}
