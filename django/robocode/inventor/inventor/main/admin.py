from django.contrib import admin

from .models import *

# Register your models here.


@admin.register(Room)
class RoomAdmin(admin.ModelAdmin):
    list_display = ['id', 'name', 'slug']
    prepopulated_fields = {"slug": ('name',)}


@admin.register(Owner)
class OwnerAdmin(admin.ModelAdmin):
    list_display = ['id', 'name', 'slug']
    prepopulated_fields = {"slug": ('name',)}


@admin.register(MyObject)
class MyObjectAdmin(admin.ModelAdmin):
    list_display = ['id', 'name', 'slug', 'owner', 'description']
    prepopulated_fields = {"slug": ('name',)}
