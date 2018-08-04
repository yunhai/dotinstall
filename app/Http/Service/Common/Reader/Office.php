<?php
namespace App\Http\Service\Common\Reader;

class Office
{
    public function read($target)
    {
        if (isset($target) && !file_exists($target)) {
            return '';
        }

        $fileArray = pathinfo($target);
        $file_ext = $fileArray['extension'];

        if ($file_ext == 'doc') {
            return $this->read_doc($target);
        } elseif ($file_ext == 'docx') {
            return $this->read_docx($target);
        } elseif ($file_ext == 'xlsx') {
            return $this->xlsx_to_text($target);
        } elseif ($file_ext == 'pptx') {
            return $this->pptx_to_text($target);
        }
        return '';
    }

    private function read_doc($target)
    {
        $fileHandle = fopen($target, 'r');
        $line = @fread($fileHandle, filesize($target));
        $lines = explode(chr(0x0D), $line);
        $outtext = '';
        foreach ($lines as $thisline) {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== false) || (strlen($thisline) == 0)) {
            } else {
                $outtext .= $thisline.' ';
            }
        }
        $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", '', $outtext);
        return $outtext;
    }

    private function read_docx($target)
    {
        $striped_content = '';
        $content = '';

        $zip = zip_open($target);

        if (!$zip || is_numeric($zip)) {
            return false;
        }

        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == false) {
                continue;
            }

            if (zip_entry_name($zip_entry) != 'word/document.xml') {
                continue;
            }

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', ' ', $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }


    public function xlsx_to_text($input_file)
    {
        $xml_filename = 'xl/sharedStrings.xml'; //content file name
        $zip_handle = new ZipArchive;
        $output_text = '';
        if (true === $zip_handle->open($input_file)) {
            if (($xml_index = $zip_handle->locateName($xml_filename)) !== false) {
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text = strip_tags($xml_handle->saveXML());
            } else {
                $output_text .= '';
            }
            $zip_handle->close();
        } else {
            $output_text .= '';
        }
        return $output_text;
    }

    public function pptx_to_text($input_file)
    {
        $zip_handle = new ZipArchive;
        $output_text = '';
        if (true === $zip_handle->open($input_file)) {
            $slide_number = 1; //loop through slide files
            while (($xml_index = $zip_handle->locateName('ppt/slides/slide'.$slide_number.'.xml')) !== false) {
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text .= strip_tags($xml_handle->saveXML());
                $slide_number++;
            }
            if ($slide_number == 1) {
                $output_text .= '';
            }
            $zip_handle->close();
        } else {
            $output_text .= '';
        }
        return $output_text;
    }
}
