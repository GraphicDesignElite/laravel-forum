<?php
namespace App\Helpers;

class AppHelper
{
      public function makeSummernote($content)
      {
        $dom = new \DomDocument();
        $dom->preserveWhitespace = FALSE;
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);   
        // Add no follow to non internal links
        $a = $dom->getElementsByTagName('a');
        $host = strtok($_SERVER['HTTP_HOST'], ':');
        foreach($a as $anchor) {
                $href = $anchor->attributes->getNamedItem('href')->nodeValue;

                if (preg_match('/^https?:\/\/' . preg_quote($host, '/') . '/', $href)) {
                    continue;
                }

                $noFollowRel = 'nofollow';
                $oldRelAtt = $anchor->attributes->getNamedItem('rel');

                if ($oldRelAtt == NULL) {
                    $newRel = $noFollowRel;
                } else {
                    $oldRel = $oldRelAtt->nodeValue;
                    $oldRel = explode(' ', $oldRel);
                    if (in_array($noFollowRel, $oldRel)) {
                        continue;
                    }
                    $oldRel[] = $noFollowRel;
                    $newRel = implode($oldRel,  ' ');
                }

                $newRelAtt = $dom->createAttribute('rel');
                $noFollowNode = $dom->createTextNode($newRel);
                $newRelAtt->appendChild($noFollowNode);
                $anchor->appendChild($newRelAtt);

        } 
        // Process images
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().$k.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        return $content;
      }


     public static function instance()
     {
         return new AppHelper();
     }
}