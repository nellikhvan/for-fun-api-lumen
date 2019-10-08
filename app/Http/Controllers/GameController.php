<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index()
	{
		$cars = Game::all();

		return response()->json($cars);
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function create(Request $request)
	{
		$game = Game::create($request->all());

		return response()->json($game);
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function update(Request $request, $id)
	{
		$game = Game::find($id);
		$game->name  = $request->input('name');
		$game->price = $request->input('price');
		$game->description  = $request->input('description');
		$game->save();

		return response()->json($game);
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function delete($id)
	{
		$game = Game::find($id);
		$game->delete();

		return response()->json('Removed successfully.');
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function show($id)
	{
		$game = Game::find($id);
		return response()->json($game);
	}

}

