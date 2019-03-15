<?php

namespace App\Http\Controllers\administracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag;

class TagController extends Controller
{
    public function muestratags(Request $request)
    {
        $mtags=explode(",", $request->tags);
        foreach($mtags as $tag){
            if(trim($tag)<>"") echo "<div data-tag='" . utf8_encode($tag) . "'><span>x</span>" . utf8_encode($tag) . "</div>";  
        }
    }
    public function tagsdisponibles(Request $request)
    {
        $whe="";
        $tags=$request->tags;
        if($tags<>""){
            $u="";
            $whe=" where tag not in (";
            $mtags=explode(",", $request->tags);
            foreach($mtags as $tag){
                $whe.=$u . "'" . utf8_encode($tag) . "'";
                $u=",";
            }
            $whe.=")";
        }
        $filtro=$request->filtro;
        if($filtro<>""){
            $u="";
            if($whe==""){
                $whe=" where ";
            }else{
                $whe.=" and ";
            }
            $whe.="tag like '%" . $filtro . "%'";
        }
        $sql="select * from tags {$whe} order by tag";
        //echo $sql;
        //$tags=BD::raw($sql);
        $tags=\DB::select($sql);
        foreach($tags as $tag){
            echo '<div>' . $tag->tag . "</div>";
        }
    }
    public function agregartag(Request $request)
    {
        $filtro=$request->filtro;
        if($filtro<>""){
            $tag=Tag::where('tag',$filtro)->count();
            if($tag==0){
                $data = array(
                    'tag' => $filtro
                );
                Tag::create($data);
            }
        }
        $tags=$request->tags;
        $agregaeltag=true;
        $respuesta="";
        if($tags<>""){
            $mtags=explode(",", $request->tags);
            foreach($mtags as $tag){
                $respuesta.=utf8_encode($tag) . ",";
                if(utf8_encode($tag)==$filtro) $agregaeltag=false;
            }
        }
        if($agregaeltag) $respuesta.=$filtro;
        echo trim($respuesta);
    }
    public function eliminatag(Request $request)
    {
        $tag_eliminar=$request->tag;
        $tags=$request->tag;
        $respuesta="";
        if($tags<>""){
            $mtags=explode(",", $request->tag);
            foreach($mtags as $tag){
                if(trim($tag)<>"" and utf8_encode($tag)<>$tag_eliminar) $respuesta.=utf8_encode($tag) . ",";
            }
        }
        echo trim($respuesta);
    }
}
