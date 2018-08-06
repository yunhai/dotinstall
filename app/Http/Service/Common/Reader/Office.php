<?php
namespace App\Http\Service\Common\Reader;

class Office
{
    public function read($target)
    {
        if (isset($target) && !file_exists($target)) {
            return '';
        }

        $extension = substr($target, strrpos($target, '.') + 1);
        if ($extension == 'doc') {
            return $this->read_doc($target);
        } elseif ($extension == 'docx') {
            return $this->read_docx($target);
        }
        return file_get_contents($target);
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
}
