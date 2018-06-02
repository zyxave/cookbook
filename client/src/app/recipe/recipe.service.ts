import { Injectable } from '@angular/core';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs';
import 'rxjs/add/observable/of';

import { RecipeModel } from './recipe.model';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json' })
};

const app_path = "http://localhost/cookbook/server/";

@Injectable()
export class RecipeService {

  constructor(public http: HttpClient) { }

  getRecipes(): Observable<any> {
  	return this.http.get(app_path + "getRecipe.php");
  }

  addRecipes(recipe: RecipeModel): Observable<any> {
  	return this.http.post(app_path + "addRecipe.php", recipe, httpOptions);
  }
  
}
