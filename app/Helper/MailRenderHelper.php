<?php

namespace App\Helper;

use DOMDocument;

class MailRenderHelper
{
    /**
     * Conteúdo HTML.
     * @var string
     */
    protected $html;

    /**
     * Construtor da class para ajudar a remover tags HTML.
     * @param string $html
     */
    public function __construct(string $html)
    {
        $this->html = $html;
    }

    /**
     * Método para criar uma instância dessa classe.
     * @param string $html
     * @return static
     */
    public static function make(string $html): self
    {
        return new self($html);
    }

    /**
     * Método para remover uma etiqueta do conteúdo HTML.
     * @param string $tag
     * @return $this
     */
    public function removeTags(string $tag): self
    {
        $dom = new DOMDocument();
        $dom->loadHTML($this->html);
        $script = $dom->getElementsByTagName($tag);

        $remove = [];
        foreach ($script as $item) {
            $remove[] = $item;
        }

        foreach ($remove as $item) {
            $item->parentNode->removeChild($item);
        }

        $this->html = $dom->saveHTML();

        return $this;
    }

    /**
     * Método para retornar o conteúdo HTML.
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }
}
