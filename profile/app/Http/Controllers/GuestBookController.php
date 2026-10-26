<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBook;

class GuestBookController extends Controller
{
    public function index () {

        if (!session('user_id')) {
            return redirect('/');
        }
        
        $messages = GuestBook::all();

        return view('guestBook', compact('messages'));
    }

        public function add(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        GuestBook::create([
            'name'    => $request->input('name'),
            'message' => $request->input('message'),
            'time'    => now(),
        ]);

        return redirect()->route('guestbook.index');
    }

        public function delete($id)
    {
        GuestBook::destroy($id);

        return redirect()->route('guestbook.index');
    }

    public function edit($id)
    {
        if (!session('user_id')) {
            return redirect('/');
        }
        
        $message = GuestBook::findOrFail($id);

        return view('guestBookEdit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nameEdit'    => 'required|string|max:100',
            'messageEdit' => 'required|string',
        ]);

        $message = GuestBook::findOrFail($id);

        $message->update([
            'name'    => $request->input('nameEdit'),
            'message' => $request->input('messageEdit'),
        ]);

        return redirect()->route('guestbook.index');
    }
}

