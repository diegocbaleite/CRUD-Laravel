<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function index()
    {
        $jogos = Jogo::all();
        return view('jogos.index', ['jogos' => $jogos]);
    }

    public function create()
    {
        return view('jogos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano_criacao' => 'required|integer|min:1900|max:2099',
            'valor' => 'required|numeric|min:0',
        ]);

        Jogo::create($validatedData);
        return redirect()->route('jogos-index')->with('success', 'Jogo criado com sucesso!');
    }

    public function edit($id)
    {
        $jogos = Jogo::find($id);
        if ($jogos) {
            return view('jogos.edit', ['jogos' => $jogos]);
        } else {
            return redirect()->route('jogos-index')->with('error', 'Jogo não encontrado!');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'ano_criacao' => 'required|integer|min:1900|max:2099',
            'valor' => 'required|numeric|min:0',
        ]);

        $jogo = Jogo::find($id);
        if ($jogo) {
            $jogo->update($validatedData);
            return redirect()->route('jogos-index')->with('success', 'Jogo atualizado com sucesso!');
        } else {
            return redirect()->route('jogos-index')->with('error', 'Jogo não encontrado!');
        }
    }
    public function destroy($id)
    {
        $jogo = Jogo::find($id);
        if ($jogo) {
            $jogo->delete($id);
            return redirect()->route('jogos-index')->with('success', 'Jogo deletado com sucesso!');
        } else {
            return redirect()->route('jogos-index')->with('error', 'Jogo não encontrado!');
        }
    }
}