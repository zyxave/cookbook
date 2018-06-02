import { Component, OnInit } from '@angular/core';

import { RecipeModel } from './recipe.model';
import { RecipeService } from './recipe.service';

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.component.html',
  styleUrls: ['./recipe.component.css']
})
export class RecipeComponent implements OnInit {

  recipes: RecipeModel[];

  searchbar: string = "";

  constructor(public rs: RecipeService) { }

  ngOnInit() {
  	this.getRecipes();
  }

  getRecipes() {
  	this.rs.getRecipes().subscribe(
  		(data) => {
  			this.recipes = data;
  		});
  }

  clearSearch() {
    this.searchbar = "";
  }

}
