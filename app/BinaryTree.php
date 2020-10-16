<?php

namespace App;

class BinaryTree
{
    private ?Node $root;

    public function __construct(?Node $root = null)
    {
        if (!is_null($root) && !$root instanceof Node) {
            $root = new Node($root);
        }
        $this->root = $root;
    }

    public static function convert($value)
    {
        if ($value instanceof Node) {
            return $value;
        }
        return new Node($value);
    }

    public function push(Node $node)
    {
        if (is_null($this->root)) {
            return $this->root = $node;
        }

        return $this->root->addNode($node);
    }

    public function get(callable $callback)
    {
        if (!is_null($this->root) && $callback($this->root)) {
            return $this->root;
        }

        if (!is_null($this->root->leftNode) && $callback($this->root->leftNode)) {
            return $this->root->leftNode;
        }

        if (!is_null($this->root->rightNode) && $callback($this->root->rightNode)) {
            return $this->root->righttNode;
        }
    }

    public function totalLeft()
    {
        if (!$this->root || !$this->root->leftNode) {
            return 0;
        }

        return $this->root->leftNode->totalPts();
    }

    public function totalRight()
    {
        if (!$this->root || !$this->root->rightNode) {
            return 0;
        }

        return $this->root->rightNode->totalPts();
    }

    public function toArray()
    {
        if (is_null($this->root)) {
            return [];
        }

        $arr = [&$this->root->value];

        if ($this->root->leftNode) {
            $this->root->value['left'] = $this->root->leftNode->value['pts'];
            $this->root->leftNode->toArray($arr);
        }

        if ($this->root->rightNode) {
            $this->root->value['right'] = $this->root->rightNode->value['pts'];
            $this->root->rightNode->toArray($arr);
        }

        return $arr;
    }

    public static function build($nodes)
    {
        $tree = new BinaryTree();
        foreach ($nodes as $node) {
            $tree->push(static::convert($node));
        }
        return $tree;
    }
}
