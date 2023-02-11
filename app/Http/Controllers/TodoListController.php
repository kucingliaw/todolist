<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        return view('welcome', ['listItems' => ListItem::all()]);
    }

    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function deleteItem($id)
    {
        $listItem = ListItem::find($id);
        $listItem->delete();

        return redirect('/');
    }

    public function saveItem(Request $request)
    {
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect('/');
    }
}
