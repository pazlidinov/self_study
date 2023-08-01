from django import forms
from .models import Leed_user

class LeedUserForm(forms.ModelForm):
    class Meta:
        model = Leed_user
        fields = ['name','phone','age','address']