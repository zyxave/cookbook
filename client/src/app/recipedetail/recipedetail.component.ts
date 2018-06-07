import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { Location } from '@angular/common';

import { RecipeService } from '../recipe/recipe.service';
import { RecipeModel } from '../recipe/recipe.model';

@Component({
  selector: 'app-recipedetail',
  templateUrl: './recipedetail.component.html',
  styleUrls: ['./recipedetail.component.css']
})
export class RecipedetailComponent implements OnInit {

  id: number;
  recipe: RecipeModel;

  pageStatus: string = "desc";

  bkStatus;
  lsStatus;

  constructor( public rs: RecipeService, public route: ActivatedRoute, public location: Location) {
  	this.id = parseInt(this.route.snapshot.paramMap.get('id'));
  }

  ngOnInit() {
    this.getRecipes();
  }
 
  goBack() {
    this.location.back();
  }

  getRecipes() {
    this.rs.getRecipes(this.id).subscribe(
      data => {
        this.recipe = data;
      });
  }

  getDesc() {
    this.pageStatus = "desc";
  }

  getIngr() {
    this.pageStatus = "ingr";
  }

  bookmark(bkCur) {
    this.bkStatus = (bkCur == '0' ? '1' : '0');

    this.rs.bookmark(this.id, parseInt(this.bkStatus)).subscribe(
      data => { 
        this.recipe.bookmark = data;
      });
  }

  addShoplist(lsCur)
  {
    this.lsStatus = (lsCur == '0' ? '1' : '0')

    this.rs.addShoplist(this.id, parseInt(this.lsStatus)).subscribe(
      data => {
        this.recipe.listed = data;
      });
  }

}
