from django.contrib import admin
from .models import Category, Post, Comments

# Register your models here.


@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display = ["id", "name", "slug"]
    prepopulated_fields = {"slug": ("name",)}


@admin.register(Post)
class PostAdmin(admin.ModelAdmin):
    list_display = ["id", "title", "slug"]
    prepopulated_fields = {"slug": ("title",)}


admin.site.register(Comments)
