import { Component, OnInit } from '@angular/core';

import { RecipeModel } from './recipe.model';
import { RecipeService } from './recipe.service';

@Component({
  selector: 'app-recipe',
  templateUrl: './recipe.component.html',
  styleUrls: ['./recipe.component.css']
})
export class RecipeComponent implements OnInit {

  constructor(public rs: RecipeService) { }

  ngOnInit() {
  	this.getRecipes();
  }

  recipes: RecipeModel[];

  getRecipes() {
  	this.rs.getRecipes().subscribe(
  		(data) => {
  			this.recipes = data;
  		});
  }

}
