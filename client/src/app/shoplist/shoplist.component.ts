import { Component, OnInit } from '@angular/core';
import { RecipeService } from '../recipe/recipe.service';
import { RecipeModel } from '../recipe/recipe.model';

@Component({
  selector: 'app-shoplist',
  templateUrl: './shoplist.component.html',
  styleUrls: ['./shoplist.component.css']
})
export class ShoplistComponent implements OnInit {

  recipes: RecipeModel[];

  constructor(public rs: RecipeService) { }

  ngOnInit() {
  	this.getRecipes();
  }

  getRecipes() {
    this.rs.getRecipes(-1, 'all', 'none', 'none', 1).subscribe(
      data => {
        this.recipes = data;
      });
  }

  bought(id, ingr, bgCur){
    let bg = (bgCur == '0') ? '1' : '0';

    this.rs.bought(id, ingr, parseInt(bg)).subscribe();
    this.rs.getRecipes(-1, 'all', 'none', 'none', 1).subscribe(
    data => {
      this.recipes = data;
    });
  }

  shopDone(id:number){
  	this.rs.shopDone(id).subscribe();
  	this.rs.getRecipes(-1, 'all', 'none', 'none', 1).subscribe(
  	data => {
  		this.recipes = data;
  	});
  }
}
