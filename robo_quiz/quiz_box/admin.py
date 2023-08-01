from django.contrib import admin
from .models import *
# Register your models here.


admin.site.register(Question)
admin.site.register(Answer)

@admin.register(Quiz)
class QuestionAdmin(admin.ModelAdmin):
    list_display=['slug', 'name', 'description']
    prepopulated_fields = {"slug":("name",)} 
