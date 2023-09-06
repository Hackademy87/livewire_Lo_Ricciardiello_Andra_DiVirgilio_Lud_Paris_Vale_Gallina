<?php

namespace App\Livewire;

use App\Models\Song;
use Livewire\Component;

class SongEdit extends Component
{



    public $title;
    public $author;
    public $category;
    public $price;
    public $songId;

    public function mount($songid){
        $this->songId = $songid;

        $song = Song::find($songid);
        $this->title = $song->title;
        $this->author = $song->author;
        $this->category = $song->category;
        $this->price = $song->price;
    }

    public function update(){
        $song = Song::find($this->songId);
        $song->update(
            [
                'title' => $this->name,
                'author' => $this->author,
                'category' => $this->category,
                'price'=> $this->price
            ]
        );
        return redirect()->route('song.index');
    }



    public function render()
    {
        return view('livewire.song-edit');
    }
}
