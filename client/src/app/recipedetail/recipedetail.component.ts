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

  idx: number;
  recipes: any;

  constructor( public rs: RecipeService, public route: ActivatedRoute) {
  	this.idx = parseInt(this.route.snapshot.paramMap.get('id'));
  }

  ngOnInit() {
    this.getRecipes();
  }

  getRecipes(){
    this.rs.getRecipes(this.idx).subscribe(
      data => {
        this.recipes = data;
      });
  }

}
