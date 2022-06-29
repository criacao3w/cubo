<?php

namespace App\Http\Controllers;

use App\Models\Recommend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecommendController extends Controller
{

    private $recommend;
    private $error = [];
    private  $header = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    ];


    public function __construct(Recommend $recommend)
    {
        $this->recommend = $recommend;
    }

    public function list(){

        return response()->json(
            $this->recommend::all() ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function show($id){
        return response()->json(
            $this->recommend::find($id) ,
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function showByProduct($id){

        return response()->json(
            $this->recommend::query()->where('id_product', $id)->get(),
            200, $this->header,
            JSON_UNESCAPED_UNICODE
        );
    }

    public function store(Request $request){

        $request['cpf'] = preg_replace('/\D/', '', $request['cpf']);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'telephone' => 'required',
            'name' => 'required',
            'cpf' => 'required|unique:recommend'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->toJson();
        }

        $cpf = $request['cpf'];
        if(!$this->isValidateCpf($cpf)){
            return response()->json([
                'data' => [
                    'status' => 'error',
                    'message' => 'The cpf must be a valid cpf.',
                ]
            ]);
        }

        $this->recommend->create($request->all());
        return response()->json([
            'data' => [
                'status' => 'success',
                'message' => 'Recomendação feita com sucesso!',
            ]
        ]);
    }

    public function update($id, Request $request){

        $recommend = $this->recommend->find($id);
        $recommend->update($request->all());

        return response()->json([
            'data' => [
                'status' => 'success',
                'message' => 'Recomendação atualizada com sucesso!'
            ]
        ]);
    }

    public function destroy($id){

        $recommend = $this->recommend->find($id);
        $recommend->delete();

        return response()->json([
            'data' => [
                'status' => 'success',
                'message' => 'Recomendação excluída com sucesso!'
            ]
        ]);
    }

    public function isValidateCpf($value)
    {
        $c = preg_replace('/\D/', '', $value);
        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }
        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }
        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);
        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }
        return true;
    }
}
