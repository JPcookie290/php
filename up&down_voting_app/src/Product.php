<?php
class Product
{
    readonly string $id;
    readonly string $file_name;
    public string $title;
    public string $up_votes;
    public string $down_votes;

    public function getSrc(): string {
        return "uploads/img/{$this->file_name}";
    }
}
