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

  getRecipes(id: number = -1, filter: string = 'all', sort: string = 'none', search: string = 'none'): Observable<any> {
  	let path = app_path + "getRecipes.php?";

    if(search == 'none'){
      if(id != -1){
        path += "id=" + id;
      }

      if(filter != 'all'){
        path += "filter=" + filter;
      }

      if(sort != 'none'){
        if(path.substr((path.length - 1), 1) != '?'){
          path += "&"
        }

        path += "sort=" + sort;
      }
    }
	  else{
      path += "search=" + search;
    }

  	return this.http.get(path);
  }

  addRecipes(recipe: RecipeModel): Observable<any> {
  	return this.http.post(app_path + "addRecipe.php", recipe, httpOptions);
  }

  bookmark(id: number, bk: number): Observable<any> {
  	return this.http.get(app_path + "bookmarkRecipe.php?id=" + id + "&bk=" + bk);
  }

  getCategories(): Observable<any> {
    return this.http.get(app_path + "getCategories.php");
  }
  
}
