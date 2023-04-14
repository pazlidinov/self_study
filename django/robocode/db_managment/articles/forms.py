from django import forms

from .models import Article


class AddArticleForm(forms.ModelForm):

    class Meta:
        model = Article
        fields = ['title', 'tag', 'category', 'body']
        widgets = {
            'title': forms.TextInput(attrs={"class": "form-control"}),
            'tag': forms.CheckboxSelectMultiple(attrs={"class": "form-check"}),
            'category': forms.Select(attrs={"class": "form-select"}),
            'body': forms.Textarea(attrs={"class": "form-control"}),
        }
