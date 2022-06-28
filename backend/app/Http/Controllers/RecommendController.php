<?php

namespace App\Http\Controllers;

use App\Models\Recommend;
use Illuminate\Http\Request;

class RecommendController extends Controller
{

    private $recommend;
    private  $header = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    ];


    public function __construct(Recommend $recommend)
    {
        $this->recommend = $recommend;
    }

    public function getRecommendAll(){
        return response()->json(
            $this->recommend::all() ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function getRecommend($id){
        return response()->json(
            $this->recommend::find($id) ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function getRecommendByProduct($id){

        return response()->json(
            $this->recommend::query()->where('id_product', $id)->get(),
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function saveRecommend(Request $request){

        $this->recommend->create($request->all());

        return response()->json([
            'data' => [
                'message' => 'Recomendação feita com sucesso!',
                'data' => $request->all()
            ]
        ]);
    }

    public function updateRecommend($id, Request $request){

        $recommend = $this->recommend->find($id);
        $recommend->update($request->all());

        return response()->json([
            'data' => [
                'message' => 'Recomendação atualizada com sucesso!',
                'data' => $request->all()
            ]
        ]);
    }

    public function destroyRecommend($id){

        $recommend = $this->recommend->find($id);
        $recommend->delete();

        return response()->json([
            'data' => [
                'message' => 'Recomendação excluída com sucesso!'
            ]
        ]);
    }
}
