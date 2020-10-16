<?php

namespace App;

class Node
{
    private ?Node $leftNode;
    private ?Node $rightNode;
    private $state;

    public function __construct($value, ?Node $leftNode = null, ?Node $rightNode = null)
    {
        $this->value = $value;
        $this->leftNode = $leftNode;
        $this->rightNode = $rightNode;
    }

    public function toArray(&$arr)
    {
        $arr[] = &$this->value;

        if ($this->leftNode) {
            $this->value['left'] = $this->leftNode->value['pts'];
            $this->leftNode->toArray($arr);
        }

        if ($this->rightNode) {
            $this->value['right'] = $this->rightNode->value['pts'];
            $this->rightNode->toArray($arr);
        }
    }

    public function addNode(Node $node)
    {
        if (!is_null($this->leftNode) && !is_null($this->rightNode)) {
            if (!$this->leftNode->addNode($node)) {
                return $this->rightNode->addNode($node);
            }
        }

        if (is_null($this->leftNode)) {
            return $this->leftNode = $node;
        }

        if (is_null($this->rightNode)) {
            return $this->rightNode = $node;
        }

        return null;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
