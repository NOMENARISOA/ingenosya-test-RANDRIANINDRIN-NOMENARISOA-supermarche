<?php

namespace App\Http\Livewire;

use App\Models\produit;


trait Autocomplet
{
    public $query= '';
    public  $items = [];
    public  $selectedItems = 0;
    public  $highlightIndex = 0;
    public  $showDropdown;

    public function mount()
    {
        $this->reset();
    }

    public function reset(...$properties)
    {
        $this->items = [];
        $this->highlightIndex = 0;
        $this->query = '';
        $this->selectedItems = 0;
        $this->showDropdown = true;
    }

    public function hideDropdown()
    {
        $this->showDropdown = false;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->items) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->items) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectItem($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $item = $this->items[$id] ?? null;

        if ($item) {
            $this->showDropdown = true;
            $this->query = $item['name'];
            $this->selectedItems = $item['id'];
        }
    }


}
