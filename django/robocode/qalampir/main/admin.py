from django.contrib import admin

from .models import *

# Register your models here.


@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display = ['id', 'name', 'slug']
    prepopulated_fields = {"slug": ('name',)}


@admin.register(Article)
class ArticleAdmin(admin.ModelAdmin):
    list_display = ['id', 'name', 'slug',
                    'category', 'published_date', 'rating']
    prepopulated_fields = {"slug": ('name',)}

admin.site.register(Comment)