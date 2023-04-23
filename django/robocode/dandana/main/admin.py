from django.contrib import admin

from .models import *

# Register your models here.
admin.site.register(Food)
admin.site.register(BannerAd)


@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    prepopulated_fields = {"slug": ('title',)}
