import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { RecipeComponent } from './recipe/recipe.component';
import { RecipedetailComponent } from './recipedetail/recipedetail.component';
import { ShoplistComponent } from './shoplist/shoplist.component';
import { HeaderComponent } from './header/header.component';
import { HomeComponent } from './home/home.component';
import { NotfoundComponent } from './notfound/notfound.component';

import { RecipeService } from './recipe/recipe.service';


@NgModule({
  declarations: [
    AppComponent,
    RecipeComponent,
    RecipedetailComponent,
    ShoplistComponent,
    HeaderComponent,
    HomeComponent,
    NotfoundComponent
  ],
  imports: [
    FormsModule,
    HttpClientModule,
    BrowserModule,
    AppRoutingModule
  ],
  providers: [RecipeService],
  bootstrap: [AppComponent]
})
export class AppModule { }
