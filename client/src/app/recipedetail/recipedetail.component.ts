import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';

import { RecipeService } from '../recipe/recipe.service';
import { RecipeModel } from '../recipe/recipe.model';

@Component({
  selector: 'app-recipedetail',
  templateUrl: './recipedetail.component.html',
  styleUrls: ['./recipedetail.component.css']
})
export class RecipedetailComponent implements OnInit {

  idx: string;
  recipes: RecipeModel[];

  constructor( public rs: RecipeService, public route: ActivatedRoute) {
  	this.idx = this.route.snapshot.paramMap.get('id');
  }

  ngOnInit() {
  	this.rs.getRecipes().subscribe(
  		data => {
  			this.recipes = data;
  		});
  }

}
