<?php

 namespace Lib;
 
 Class Html
 {
 	/**
 	 * Tags sem fechamentos.
 	 * 
 	 * @var array
 	 */
 	private static $tags_without_locks = array('img', 'input');
 	
 	/**
 	 * Construção das TAG's HTML
 	 * 
 	 * @param string $tag        Nome da tag html.
 	 * @param string $content    Conteúdo da tag
 	 * @param array  $attributes Atributos da tag.
 	 */
     public static function Tag($tag, $content = '', $attributes = array())
     {
         $output = '<' . $tag;
         
         if ($attributes && is_array($attributes))
         {
             foreach ($attributes as $key => $value)
             {
                 $output .= ' ' .$key . '="' . $value . '"';
             }
         }

         $output .= in_array($tag, self::$tags_without_locks) ? ' />' : '>' .$content. '</' . $tag . '>';
         
         return $output;
     }
     
     /**
      * Tag HTML Imagem.
      *
      * @param  string  $src        Nome da imagem com o diretório.
      * @param  array   $attributes Atributos da tag imagem.
      * @return string              Retorna a tag imagem construida.
      */
     public static function Image($src, $attributes = array())
     {
         return self::Tag('img', null, array_merge(array('src' => $src), $attributes));
     }
     
     /**
      * Tag HTML Âncora.
      * 
      * @param string $content    Conteúdo da tag âncora.
      * @param string $href       url de redirecionamento.
      * @param array  $attributes Atributos da tag aêncora.
      */
     public static function Anchor($content, $href, $attributes = array())
     {
        return self::Tag('a', $content, array_merge(array('href' => $href), $attributes));
     }
     
     /**
      * Tag HTML Input.
      * 
      * @param string $name       nome do campo.
      * @param string $type       tipo do campo.
      * @param array  $attributes Atributos da tag input.
      */
     public static function Input($name, $type = 'text', $attributes = array())
     {
         return self::Tag('input', null, array_merge(array('name' => $name, 'type' => $type), $attributes));
     }
 }




?>