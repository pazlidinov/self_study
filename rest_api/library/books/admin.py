from django.contrib import admin
from .models import Book
# Register your models here.


@admin.register(Book)
class BookAdmin(admin.ModelAdmin):
    list_display = [f.name for f in Book._meta.fields]
    prepopulated_fields = {'slug': ('title',)}
