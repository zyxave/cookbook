export class RecipeModel{
	constructor(
		public id: number, 
		public name: string, 
		public desc: string,
		public image: string = 'none',
		public ingredients: string[],

		public time: string = 'none', 
		public category: string = 'none',
		public tags: string[] = [],
		public bookmark: boolean = false
		) 
	{ }
}